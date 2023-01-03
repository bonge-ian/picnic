<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;

class PagesController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Index');
    }

    public function about(): Response
    {
        return Inertia::render('About');
    }

    public function gallery(): Response
    {
        return Inertia::render('Gallery');
    }

    public function packages(): Response
    {
        $packages = Package::query()->get()->map(function (Package $package) {
            return Arr::except($package->toArray(), ['price', 'currency', 'duration', 'created_at', 'updated_at'])
                + [
                    'price' => $package->formatted_price,
                    'duration' => $package->formatted_duration,
                ];
        });

        return Inertia::render(component: 'Packages', props: compact('packages'));
    }

    public function themedPicnics(): Response
    {
        return Inertia::render('Showcase/ThemedPicnics');
    }
}
