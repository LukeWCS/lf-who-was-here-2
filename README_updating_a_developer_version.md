### Updating a developer version (dev, beta, RC) of "LF who was here 2":

#### The "clean" way: you loose all data and configuration of LF-WWH2 and you get the default configuration.

1. Download and extract the Zip archive of the GitHub release.
1. In the extension management disable "LF who was here 2".
1. In the extension management uninstall "LF who was here 2" by "Delete data".
1. Delete the folder `whowashere/` inside `ext/lukewcs/` from phpBB.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here 2".

#### The "dirty" way: you keep all data and configuration of LF-WWH2, but you must adjust all new settings.

1. Download and extract the Zip archive of the GitHub release.
1. In the extension management disable "LF who was here 2".
1. Delete the folder `whowashere/` inside `ext/lukewcs/` from phpBB.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here 2".
1. Last, you must save the settings page again: open LF-WWH2's settings, correct the settings if needed (especially the new ones) and save the page, with or without changes.
