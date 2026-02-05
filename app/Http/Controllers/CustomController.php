<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Resume;
use App\Models\Service;
use App\Models\User;
use App\Models\Website;
use Filament\Actions\Action as NotificationAction;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomController extends Controller
{
    public function home()
    {
        $web = Website::first();
        $sosmeds = $web->sosmed;
        $about = About::first();
        $resumes = Resume::orderBy('order')->get();
        $contact = Contact::first();
        $portfolios = Portfolio::orderBy('order')->get();
        $services = Service::orderBy('order')->get();
        $articles = Article::where('status', 'published')
            ->with(['category'])
            ->withAvg('ratings', 'rating')
            ->withCount('comments')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('home', compact('web', 'sosmeds', 'about', 'resumes', 'contact', 'portfolios', 'services', 'articles'));
    }

    public function show($slug)
    {
        $web = Website::first();
        $sosmeds = $web?->sosmed ?? [];
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->with([
                'category',
                'comments' => function ($query) {
                    $query->where('is_approved', true)->orderBy('created_at', 'desc');
                }
            ])
            ->withAvg('ratings', 'rating')
            ->withCount('comments')
            ->firstOrFail();

        return view('article_detail', compact('web', 'sosmeds', 'article'));
    }

    public function rate(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $article->ratings()->create([
            'rating' => $request->rating,
            'ip_address' => $request->ip(),
        ]);

        Notification::make(Str::uuid())
            ->title('Rating Baru')
            ->body("Seseorang memberikan rating {$request->rating} ⭐ pada artikel: {$article->title}")
            ->success()
            ->actions([
                NotificationAction::make('view')
                    ->label('Lihat Semua Rating')
                    ->url(route('filament.app.blog.resources.ratings.index'))
                    ->button(),
            ])
            ->sendToDatabase(User::all());

        return back()->with('success', 'Terima kasih atas ratingnya!');
    }

    public function comment(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        $article->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'is_approved' => false,
        ]);

        Notification::make(Str::uuid())
            ->title('Komentar Baru')
            ->body("Komentar baru dari **{$request->name}** pada artikel: {$article->title}. \n\n Isi: " . Str::limit($request->comment, 50))
            ->info()
            ->actions([
                NotificationAction::make('view')
                    ->label('Moderasi Komentar')
                    ->url(route('filament.app.blog.resources.comments.index'))
                    ->button(),
            ])
            ->sendToDatabase(User::all());

        return back()->with('success', 'Komentar Anda telah dikirim dan menunggu moderasi.');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'nama_2' => 'required|string|max:255',
            'email_2' => 'required|email|max:255',
            'nomor_2' => 'required|string|max:20',
            'pesan_2' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $request->nama_2,
            'email' => $request->email_2,
            'phone' => $request->nomor_2,
            'message' => $request->pesan_2,
        ]);

        Notification::make(Str::uuid())
            ->title('Pesan Kontak Baru')
            ->body("Pesan baru dari **{$request->nama_2}**. \n\n Pesan: " . Str::limit($request->pesan_2, 50))
            ->info()
            ->actions([
                NotificationAction::make('view')
                    ->label('Lihat Pesan')
                    ->url(route('filament.app.resources.contact-messages.index'))
                    ->button(),
            ])
            ->sendToDatabase(User::all());

        return back()->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
    }
}
