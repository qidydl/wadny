---
title: Shell Setup
---
Prelude: I would love to write more on here, especially longer and more thought-out posts on complicated topics, but as is plainly evident, it's not really possible for me to find the time. So instead, maybe I can manage to post some things that are just technical info dumps. Hence: a summary of my terminal and shell setup today. I recently made some changes and improvements, so now's a good time to write it up, if nothing else for my own reference.

#### Operating System

Which operating system you use heavily affects which tools and systems are available. Pretty much all of my personal systems have coalesced to [Kubuntu](https://kubuntu.org/ "The Kubuntu Linux distribution"){:rel='external'}, which is stable and well-supported, and I prefer KDE to Gnome. At work, I use Windows 11, which in Pro edition with nonsense turned off by group policy is tolerable, but has become unacceptable for personal use.

#### Configuration Management

Since I have a few different personal systems (desktop, laptop, HTPC, server), I want a way to synchronize configuration between them. I use [homeshick](https://github.com/andsens/homeshick/ "Homeshick, git-based dotfiles manager in bash"){:rel='external'} (a Bash port of [homesick](https://github.com/technicalpickles/homesick "Homesick, git-based dotfiles manager in Ruby"){:rel='external'}) to manage configuration files ("dotfiles") stored in Git repositories. It's pretty technical, but it has quite good documentation and means that all my configuration can be synchronized easily. Once a change has been pushed, all it takes is `homeshick pull` on another computer to get all the updates.

At work, I don't use any configuration management, as I only have one workstation and never remote into any servers, although there are at least two PowerShell ports of homes(h)ick ([posh-homesick](https://github.com/rbuchss/posh-homesick "Russ Buchanan's PowerShell port of homes(h)ick"){:rel='external'} and [homepsick](https://github.com/KitKat31337/homepsick "KitKat31337's PowerShell port of homeshick"){:rel='external'}).

#### Terminal

The first configuration is for the terminal program I run. I've just stuck with the default terminal, [Konsole](https://apps.kde.org/konsole/ "The KDE Konsole application, a terminal emulator"){:rel='external'}. I know there's new hotness out there like [Ghostty](https://ghostty.org/ "The Ghostty terminal emulator"){:rel='external'}, but for the moment the default Konsole works well enough to not be worth the time dealing with more configuration setup.

In [my Konsole configuration](https://github.com/qidydl/dotfiles-konsole "My configuration settings for KDE Konsole"){:rel='external'}, I don't change very much. The most important part is supplying and using a [nerd font](https://www.nerdfonts.com/ "Nerd Fonts with extra glyphs"){:rel='external'} so that extra glyphs are available.

At work, I use [Windows Terminal](https://github.com/microsoft/terminal "Microsoft Windows Terminal"){:rel='external'} which is not bad and eons ahead of the old-school Windows command prompt.

#### Shell

The second configuration is for my shell, which is [Bash](https://www.gnu.org/software/bash/ "The GNU Bash shell"){:rel='external'}. Again, it's a convenient default; not the best, but not bad. There are lots of alternatives ([zsh](https://www.zsh.org/ "The Z shell"){:rel='external'}, [fish](https://fishshell.com/ "fish shell"){:rel='external'}, [elvish](https://elv.sh/ "The elvish shell"){:rel='external'}, [nushell](https://www.nushell.sh/ "Nu shell"){:rel='external'}, [powershell](https://learn.microsoft.com/en-us/powershell/ "Microsoft PowerShell"){:rel='external'}, [xonsh](https://xon.sh/ "Xonsh, the Python-powered shell"){:rel='external'}), but it's hard to overcome inertia enough to try to migrate across a slew of various computers.

[My Bash configuration](https://github.com/qidydl/dotfiles-bash "My configuration settings for GNU Bash"){:rel='external'} has a bunch of settings to make Bash more tolerable, especially with history and tab completion. It also uses [Oh My Posh](https://ohmyposh.dev/ "Oh My Posh prompt engine"){:rel='external'} to display prompts, which is actually supported across every shell I listed above. My prompt is pretty basic, but I don't want it to be too distracting. It looks like this:

<figure>
    <img src="{% link pictures/20260903/prompt.png %}" alt="A screenshot of my shell prompt">
</figure>

At work, I use [PowerShell](https://learn.microsoft.com/en-us/powershell/ "Microsoft PowerShell documentation"){:rel='external'}, which is actually quite powerful and cross-platform. It also uses Oh My Posh with the same prompt configuration.

#### Editor

Most of my editing work is actually done in [VSCode](https://code.visualstudio.com/ "Microsoft Visual Studio Code editor"){:rel='external'} or sometimes [KDE Kate](https://apps.kde.org/kate/ "KDE Kate editor"){:rel='external'}, but sometimes it's easier to do a quick edit from the terminal, or I'm SSH'ed into a server and don't have a choice, in which case I usually use [Vim](https://www.vim.org/ "The Vim editor - vi improved"){:rel='external'}. Again (you may notice a pattern here), it's convenient and available and good enough for basic work, even though there are definitely alternatives like [Neovim](https://neovim.io/ "Neovim, a Vim-based editor"){:rel='external'}, [Micro](https://micro-editor.github.io/ "Micro terminal-based editor"){:rel='external'}, and [Helix](https://helix-editor.com/ "Helix, the post-modern editor"){:rel='external'}.

[My Vim configuration](https://github.com/qidydl/dotfiles-vim "My configuration settings for the Vim editor"){:rel='external'} uses some plugins from [Tim Pope](https://github.com/tpope/ "Tim Pope, Vim plugin artist"){:rel='external'} as well as [airline](https://github.com/vim-airline/vim-airline "vim-airline, a status/tabline plugin"){:rel='external'} so that I don't have to try to install [Powerline](https://github.com/powerline/powerline "Powerline, a statusline plugin"){:rel='external'} and Python everywhere. Mostly my configuration adds visual information to make it easier to see what's going on; my vim editing tends to be limited to basic configuration files, rather than software projects.

At work, I basically never edit anything from a terminal, so it's just VSCode.

*[HTPC]: Home Theater PC