# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

GFD Music is a Laravel 10 website for showcasing music releases and tracks by artists GFD and Roads to Atlantis. It's a public-facing catalogue site with authenticated staff/user areas.

## Commands

```bash
# Development server (Vagrant)
vagrant up                          # Start VM (Ubuntu 22.04, Apache, MySQL, PHP 8.1)
vagrant ssh                         # Access VM

# Frontend assets
npm run dev                         # Vite dev server
npm run build                       # Production build

# Testing
php artisan test                    # Run all tests
php artisan test --filter=TestName  # Run single test

# Database
php artisan migrate
php artisan LoadBaseArtistData      # Load artists, tracks, releases from CSV files
php artisan LoadRelease026          # Load specific release
php artisan LoadRelease027

# Code formatting
./vendor/bin/pint                   # Laravel Pint (PSR-12)
```

## Architecture

### Domain Layer Pattern
Business logic lives in `app/Domain/{Entity}/` with two main classes:
- **Builder**: Fluent interface for creating/modifying entities (e.g., `ReleaseBuilder->setArtist()->setName()->save()`)
- **Repo**: Query methods for finding/listing entities

### Templating
Uses **Twig** via TwigBridge instead of Blade. Templates are in `resources/views/**/*.twig`. The `ViewServiceProvider` injects `AuthUser` globally.

### Data Loading
Initial data comes from CSV files in `storage/`:
- `gfd-data-upload-tracks.csv`
- `gfd-data-upload-releases.csv`

New releases are added via dedicated artisan commands (e.g., `LoadRelease027`) that use the Builder pattern.

### Key Models
- **Artist**: Has many releases and tracks
- **Release**: Album/EP/Single with artwork and store links (Spotify, Apple, etc.)
- **Track**: Individual songs linked to releases via **ReleaseTrack** pivot
- **ReleaseTrack**: Links tracks to releases with ordering

### Enums
`app/Enums/` contains constants for:
- `ReleaseType`: Album, EP, Single, Compilation, Playlist
- `ReleaseStatus`: Live, Draft, Archived
- `ArtworkPath`: Image paths per artist

### Controllers
- `PublicSite/`: Public pages (Welcome, Release, Track, Artist, Catalogue)
- `Staff/`: Admin dashboard (auth protected via `auth.staff` middleware)
- `Auth/`: Laravel Breeze authentication
