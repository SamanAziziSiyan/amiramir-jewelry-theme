# AMIRAMIR Jewelry — Custom WordPress Theme

## Overview

A custom WordPress theme for an AMIRAMIR Jewelry site, with editorial and catalog templates, a jewelry content type, configurable header, account interactions, and an appointment form. This repository contains **theme source**, not a full WordPress installation or customer database.

## Project Context

The historical project was built for Panjere Studio in 2023–24. This is an independently prepared public source export. It has a new Git history and excludes the original site's WordPress core, uploads, credentials, customer records and client media.

## My Contribution

Saman Azizi led development of the custom theme, including its architecture, content model, settings, account interactions, AJAX functionality and frontend behavior. The original WordPress checkout has 289 Saman-attributed commits out of 451 reachable commits. Commit counts show participation, not ownership of every line or design asset.

## Collaboration

Solaiman Naderi has 162 commits in the original WordPress history, including frontend fixes and animation work. The related HTML prototype is also collaborative. WordPress, Tailwind and bundled open-source libraries are third-party work.

## Architecture

WordPress stores posts, users, options and metadata. The theme supplies PHP templates and hooks, an appointment table, and frontend JavaScript. `functions.php` loads modules from `inc/` and `admin/`.

## Content Model

The `jewelery` custom post type has `jewelery-cat` and `jewelery-tag` taxonomies. Admin meta boxes store gallery and image references. Theme settings control header text, links and selected media. Template parts render home, collection, location, archive, search and editorial views.

## User Features

AJAX handlers cover registration and login, a signed-in user's own profile, a jewelry wishlist, limited public search, and password reset. Registration follows WordPress's `users_can_register` setting. The appointment form stores a validated request in a custom table. A separate admin view lists and deletes appointments with capability and nonce checks.

## Frontend

`tailwind.css` is the editable styling source; `style.css` is the WordPress-required built stylesheet. `assets/js/app.js` contains site interactions. Swiper, Flatpickr and International Telephone Input are bundled under their source notices; see [third-party notices](THIRD-PARTY-NOTICES.md). Historical client photos, videos, logos and fonts are replaced by a neutral placeholder, so the export will not look identical to the client site.

## Integrations

An optional Polylang filter exposes the jewelry post type for translation when Polylang is installed. The theme declares WooCommerce support, but no custom checkout or product-sync implementation is claimed. No Elementor or custom REST API implementation is included.

## Docker Development

`compose.yaml` is an **optional local development environment** with WordPress/Apache and MariaDB. It is newly sanitized for this export; it is not a production or k3s deployment. Copy `.env.example` to `.env`, set unique local `WP_DB_PASSWORD` and `DB_ROOT_PASSWORD` values, then run `docker compose up -d`. Open `http://localhost:8085`, complete WordPress setup, and activate the `jewelery` theme. The `.env` file is ignored by Git. Docker Desktop must be running.

## Configuration

No `wp-config.php`, salts or real database credentials are included. Configure WordPress normally, and enable registration only if needed for a local demo. Configure outbound email for password reset before relying on that flow. The optional Polylang plugin is not bundled. Replace demo placeholders only with media you have rights to publish.

## Testing

Run `php tests/security-smoke.php` for behavior checks covering anonymous and low-privilege denial, nonces, object validation, account reset response, appointment validation and parameterized SQL. Run `npm ci`, `npm run check:js`, and `npm run build:css`. PHP syntax can be checked with `php -l` over the theme's PHP files. The CSS build and syntax/security checks passed during export preparation. A live WordPress activation test was unavailable because the local Docker engine was not running.

## Security

The **public export** removes the historical unauthenticated profile and broken image-upload hooks, adds authorization and nonce checks to wishlist/profile operations, avoids account enumeration in password reset, validates appointments, parameterizes the form query, protects admin deletion, and checks meta-box saves. These changes do not establish that the historical deployed site had the same protections. The original Compose credentials were removed; credentials from the old project should be rotated if they were ever used on a live/shared server.

## Screenshots / Demo

No client screenshot or production data is included. The neutral SVG in `assets/images/placeholder.svg` keeps layouts understandable without redistributing uncertain media. A rights-cleared demo and visual review would improve the portfolio presentation.

## Repository Scope

Only the theme, reviewed build inputs, safe local Compose example, behavior tests and documentation are included. The original company Git history, WordPress core, plugins, uploads, database, private configuration, font/media library, and historical Fancybox bundle are excluded. `EXTRACTION-MANIFEST.json` summarizes the extraction categories.

## Limitations

The theme is a historical 2023–24 project adapted for a public code review. Some visual sections use placeholders or await WordPress content/settings. The complete customer site, production infrastructure and k3s configuration are not represented. A live integration test and full visual QA remain to be done.

## Project Status

Public portfolio source export with security and asset changes; not a production distribution package.

## License

**To be determined.** The original theme header mentioned GPLv2-or-later, but a final first-party license and contributor approval have not been established. Bundled third-party notices are preserved separately. No permission to reuse this first-party source is implied by its public visibility.
