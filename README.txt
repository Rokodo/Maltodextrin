Maltodextrin v1.0 by Robert Lydon
-------------------------------------------
http://maltodextr.in
-------------------------------------------

INTRODUCTION:
This software is designed to be as user-friendly as possible and does not require a SQL database.
It is assumed users know how to upload files to their webhosting directory via FTP/SFTP, SSH etc.

-------------------------------------------

DISCLAIMER:
The developer will not accept responsibility for outcomes resulting from the use of this software or any of its modified copies, including any personal damages or loss, be that data, financial or otherwise. 
Use this software at your own risk.
For further information see LICENSE below.

-------------------------------------------

INSTALLATION:
1. Using a suitable text editor like Notepad++, replace contents of $username, $password, $random1 and $random2 in /admin/login.php for login security. $username and $password contents must be remembered for the login page as accessed via a web browser. $random1 and $random2 can be anything you like and you don't need to remember these, they are used to generate a (relatively) secure salt based MD5 hash.
2. Copy all files to the relevant public_html directory or equivalent directory (e.g. htdocs) of your webhosting.
3. For guaranteed functionality, ensure file permissions for php files are set to CHMOD code 755. For beginners: You can do this manually on a UNIX or Linux based server via CLI or you can GUI batch process uploaded php files via right click in FTP clients such as FileZilla.
4. Access http://yourwebsite.com/admin/ and login with your details to get creating! 
5. IMPORTANT: Ensure sessions are enabled in the php.ini file on your webhosting space.

-------------------------------------------

LICENSE:
This software is released under the GNU General Public License v3, see included file:
GPL.txt

Maltodextrin v1.0 - A lightweight, PHP driven Content Management System.
Copyright (C) 2013-14 Robert Lydon <astonishict@gmail.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.