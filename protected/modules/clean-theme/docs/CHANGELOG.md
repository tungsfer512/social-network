Changelog
=========

1.4.2 (May 24, 2023)
--------------------

- Chg: On large screens, container max width is now 1600 px (instead of bootstrap native 1170px)
- Enh #3: On profile or space header, if a banner image is present, add a translucent black background layer to better
  see the text (thanks @dantefromhell)
- Chg: On clean theme "base" and "bordered", on profile or space header, the text is now white and if no image is
  present, the background is with the primary color (it was already the case with the "contrasted" theme)

1.4.1 (May 4, 2023)
--------------------

- Chg: Moved `@smallScreen` and `@tinyScreen` from `humhub+mobile.less` to `variables.less`
- Chg: Replaced `@headings-color` with `@text-color-main`
- Enh: Added config page (for admins)
- Enh: Added a child theme example (
  see [docs/README.md](https://github.com/cuzy-app/humhub-modules-clean-theme/blob/master/docs/README.md#child-themes))

1.4.0 (March 11, 2023)
--------------------

- Chg: CSS compiled for Humhub 1.14
- Chg: Minimal Humhub version is now 1.14
- Fix: Removed the gap between the content and the top menu on mobile view (thanks @Eladnarlea)

1.3.1 (February 10, 2023)
--------------------

- Fix: When the module was disabled, the theme was not changed to the default HumHub theme (thanks @luke-).
- Enh: When the module is enabled, the theme is automatically changed to the clean-base theme (thanks @luke-).

1.3.0 (February 3, 2023)
--------------------

- Enh: Added possibility to collapse the left navigation menu (in a space, profile, account and admin menu) with
  the `collapsibleLeftNavigation`
  property ([see the documentation](https://docs.humhub.org/docs/admin/advanced-configuration)).
- Chg: On the top menu, added "Search" text bellow the magnifying glass icon
- Chg: "Success" and "Warning" colors (green and orange) are now darker to have a better contrast with the white text
  inside buttons
- Chg: Button font weight is now 600 instead of 500 to read better the text
- Fix: In the account top menu (dropdown menu at the top right), removed left bar when hovering the menu items
- Fix: CSS build for bordered theme

1.2.0 (January 3, 2023)
--------------------

- Chg: CSS compiled for Humhub 1.13
- Chg: Minimal Humhub version is now 1.13

1.1.1 (September 27, 2022)
--------------------

- Fix: On small screens, the top menu items could have text not centered

1.1 (September 25, 2022)
--------------------

- Fix: Position of notifications (+ mail) dropdown on mobile (thanks @felixhahnweilheim)

1.0 (September 20, 2022)
--------------------

- Fix: Small fixes for the menu on small screens
- Enh: Tested enough for releasing version 1.0

0.3 (August 26, 2022)
--------------------

- Fix: Added compatibility with Theme Builder module (for `clean-base` theme)
- Chg: Compiled for Humhub 1.12

0.2 (August 23, 2022)
--------------------

- Enh: Fix menu dropdown when browser is extended (thanks @sebmennetrier)
- Chg: Removed dark theme

0.1 (May 12, 2022)
--------------------

- Enh: Initial commit