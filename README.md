# spotifyDownload

spotifyDownload is very simple and dirty Spotify music downloader.

It is "written in 5 minutes" kind of thing. It works, but you should not look at the code, because it can hurt you.
Tested on OS X 10.10.5

### Requirements
php5-cli and [youtube-dl]

### Installation
```sh
cp -r spotifyDownload /usr/local/bin/spotifyDownload
chmod +x /usr/local/bin/spotifyDownload
```
### Usage
 - run **spotifyDownload** from terminal
 - drag-n-drop songs from Spotify app to the terminal window
 - you should see Spotify URLs in the terminal window afterwards
 - write "end" on the new line when you finish adding new Spotify URLs to the terminal
 - hit enter
 - the songs will appear in the current directory

_Keep in mind, that Youtube is being used as the source, so expect some possible mismatched results (i.e.: unexpected remix version etc.)_

### TODO
 - refactor code
 - (maybe) rewrite code to Golang
 - add some installation script

[youtube-dl]: <https://rg3.github.io/youtube-dl/>
