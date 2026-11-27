<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/projects', function () {
    return redirect('/#proyek');
})->name('projects');

Route::get('/contact', function () {
    return redirect('/#kontak');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

Route::get('/cv', function () {
    $cvPath = public_path('files/cv-angga-nugraha-sofyan.pdf');

    if (! file_exists($cvPath)) {
        abort(404, 'CV belum tersedia.');
    }

    // Served inline so the browser opens it straight away in the PDF viewer,
    // which also exposes its own download button.
    return response()->file($cvPath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="CV-AnggaNugrahaSofyan.pdf"',
    ]);
})->name('cv.view');

Route::get('/cv/download', function () {
    $cvPath = public_path('files/cv-angga-nugraha-sofyan.pdf');

    if (! file_exists($cvPath)) {
        abort(404, 'CV belum tersedia.');
    }

    return response()->download($cvPath, 'CV-AnggaNugrahaSofyan.pdf', [
        'Content-Type' => 'application/pdf',
    ]);
})->name('cv.download');
