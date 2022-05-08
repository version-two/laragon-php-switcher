# Laragon PHP version switcher for Windows

[Laragon](https://laragon.org/) PHP version switcher is a simple tool that adds a simple way to quickly change PHP version system wide. For now, the script need to be run manually, in future i'd like it to be added to Laragon to run autoamtically upon changing active PHP version.

Script simply lists all installed PHP version within [Laragon](https://laragon.org/) `bin\php` folder and allows you to select active version by number. After selecting the script creates symlink `_current` in your `Laragon\etc\php` folder to the new active PHP version.

*Author of this script is not affiliated with Laragon or it's creators in any way and is simply trying to provide a quick fix for missing feature.*

## Installation

Simply put `switcher.php` and `switcher.bat` files into your `Laragon\bin\php` folder.

## Usage

### If you have PHP already working systemwide
If you already have PHP installed, simply run `switcher.bat`. Your console will show numbered list of all PHP versions that are available in your `Laragon\bin\php` folder. 

You can pick your desired PHP version by number.



![PHP installed](https://cdn.v2.sk/git/lpvs_cmd1.png)

### If you don't have PHP working systemwide yet
If you don't have PHP setup in your `%PATH%` envirnment variable yet, you run the script from your installed php path in following way:
```
cd c:\laragon\bin\php\php-7.4.22-Win32-VC15-x64\
php.exe c:\_laragon\bin\php\switcher.php
```

### Only needs to be done once:
After choosing your desired PHP version, the script will display a path that you should add to your `%PATH%` envirnment variable, replacing path to your PHP folder.

![PHP not installed yet](https://cdn.v2.sk/git/lpvs_cmd2.png)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[APACHE2.0](https://www.apache.org/licenses/LICENSE-2.0)