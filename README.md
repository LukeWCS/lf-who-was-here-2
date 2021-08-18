## LF who was here 2
Extension for phpBB - Shows a visitor statistic of the current day or a freely selectable period. It lists both members and bots, as well as numbers on visible members, invisible members, bots and guests. In addition, the extension offers a visitor record and is extensively adjustable.

### Minimum requirements
* phpBB 3.2.10
* PHP 7.0.0

[![Build Status](https://github.com/LukeWCS/lf-who-was-here-2/workflows/Tests/badge.svg)](https://github.com/LukeWCS/lf-who-was-here-2/actions)

### Installation / Update of LF-WWH 2
1. Download and extract the Zip archive of the [GitHub release](https://github.com/LukeWCS/lf-who-was-here-2/releases).
1. In the extension management disable "LF who was here 2", if already existing.
1. Delete the folder `whowashere/` inside `ext/lukewcs/` from phpBB, if already existing.
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here 2".

### Upgrade of an old WWH extension (NV-WWH or LF-WWH 1):
1. Leave the old WWH extension installed and active. A short-term parallel operation with LF-WWH 2 is technically intended and legitimate.
1. Download and extract the Zip archive of the [GitHub release](https://github.com/LukeWCS/lf-who-was-here-2/releases).
1. Copy the folder `lukewcs/` from the Zip archive including all subfolders and files to `ext/` from phpBB (upload).
1. In the extension management, enable "LF who was here 2". This will also automatically perform a data transfer.
1. Check and compare in the settings (ACP) and the WWH display (forum index), whether the settings and all data (in particular the visitor record) have been transferred correctly. If the upgrade was successful, the next step can be performed.
1. Affects only LF-WWH 1: As the permissions are not transferred during data transfer, they must be adjusted after the upgrade, provided that the phpBB full rights system has been used before. If only the simplified rights system ("Display for guests:") of LF-WWH 1 was used before, this step can be omitted.
1. Now the old WWH extension can be disabled and uninstalled ("Delete data").

### History
* phpBB 3.2 Extension fork (c) 2018 by LukeWCS
* phpBB 3.1 Extension (c) 2015 by Anvar
* phpBB 3.0 modification (c) 2013 by Joas Schilling [nickvergessen]
