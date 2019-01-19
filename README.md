# hmrc-php-cli

CLI tools for the HMRC API, built upon https://github.com/ecoofficekbo/hmrcmtd

Currently developed on PHP 7.3. Likely to work on older versions.

This is not an official HMRC project, and is currently experimental. Code contributions welcome; but please do not ask for any sort of support or consultancy as we have no scope for that.

## Instructions for setting up with HMRC

1. Sign up for an HMRC developer account.

1. Within that account, create an application.

1. For the application, subscribe to the relevant APIs (for VAT APIs, that means 'VAT (MTD)' and 'Create Test User').

1. Make a note of your client ID, client secret and server token.

## Installation instructions

1. Download the source from Git by one means or another (e.g. clone, download zip)

1. Install dependencies via running `composer install`

1. Follow the installation and testing instructions of https://github.com/ecoofficekbo/hmrcmtd up to the point immediately before creating a test user. The .env file should go in the base directory of hmrc-php-cli, *not* vendor/ecohmrc/mtd
