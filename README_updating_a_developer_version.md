### Updating a developer version (dev, beta, RC) of LF-WWH:

#### The "clean" way: you loose all data and configuration of LF-WWH and you get the default configuration.

1. Download and extract the Zip archive of the GitHub release.
1. In the extension management disable "LF who was here (2.x)".
1. In the extension management uninstall "LF who was here (2.x)" by "Delete data".
1. Delete the folder `whowashere/` inside `ext/lukewcs/`.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here (2.x)".

#### The "dirty" way: you keep all data and configuration of LF-WWH, but you must adjust all new settings.

1. Download and extract the Zip archive of the GitHub release.
1. In the extension management disable "LF who was here (2.x)".
1. Delete the folder `whowashere/` inside `ext/lukewcs/`.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here (2.x)".
1. In the "GENERAL" tab use "Purge the cache".
1. Last, you must save the settings page again: open LFWWH's settings, correct the settings if needed (especially the new ones) and save the page, with or without changes.
