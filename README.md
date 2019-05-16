## LF who was here (2.x)
Extension for phpBB 3.2 - Shows a visitor statistic of the current day or a freely selectable period. It lists both members and bots, as well as numbers on visible members, invisible members, bots and guests. In addition, the extension offers a visitor record and is extensively adjustable.

[![Build Status](https://travis-ci.org/LukeWCS/lf-who-was-here-2.svg?branch=master)](https://travis-ci.org/LukeWCS/lf-who-was-here-2)

### Installation / Update of LF-WWH 2.x
1. Download and extract the Zip archive of the GitHub release.
1. In the extension management disable "LF who was here (2.x)", if already existing.
1. Delete the folder `whowashere/` inside `ext/lukewcs/` from phpBB, if already existing.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here (2.x)".

### Upgrade of an old WWH extension (NV-WWH or LF-WWH 1.x):
1. Download and extract the Zip archive of the GitHub release.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here (2.x)". This will also automatically perform a data transfer.
1. Check and compare in the settings (ACP) and the WWH display (forum index), whether the settings and all data (in particular the visitor record) have been transferred correctly. If the upgrade was successful, the next step can be performed.
1. Affects only LFWWH 1x: As the permissions are not transferred during data transfer, they must be adjusted after the upgrade, provided that the phpBB full rights system has been used before. If only the simplified rights system ("Display for guests:") of LF-WWH was used before, this step can be omitted.
1. Now the old WWH extension can be disabled and uninstalled ("Delete data").

### History
* phpBB 3.2 Extension fork (c) 2018 by LukeWCS
* phpBB 3.1 Extension (c) 2015 by Anvar
* phpBB 3.0 modification (c) 2013 by Joas Schilling [nickvergessen]
