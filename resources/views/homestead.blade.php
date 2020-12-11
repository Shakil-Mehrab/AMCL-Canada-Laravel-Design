homestead//////////////////
cdd~
relaease porjonto same
<!-- for batch -->
<!-- dailyusage -->
name the file hs.bat & go to enviroment.click env variabl.find papth.paste C:\Users\mehra\hs
@echo off
set cwd=%cd%
set homesteadVagrant=C:\Users\mehra\Homestead
cd /d %homesteadVagrant% && vagrant %*
cd /d %cwd%
set cwd=
set homesteadVagrant=


C:\Users\Shakil>homestead up
C:\Users\Shakil>homestead reload --provision

C:\Users\Shakil>homestead ssh 
vagrant@homestead:~$ //ekhane jabe
vagrant@homestead:~/shakil$
vagrant@homestead:~/shakil/blog$ 
vagrant@homestead:~/shakil$ exit
C:\Users\Shakil>homestead halt



//anywhere
vagrat -v
cd ~  //root directory
git .bat ta dekho
vagrant@homestead:~$
rm -rf code //code namer folder remove hobe
kono folder a git bash open koro
touch index.php
laravel //laravel installer ve



vagrant/////////////////
cdd~
relaease porjonto same

Shakil@FSL-01 MINGW64 ~/Homestead (master)
ssh-keygen -t rsa -C "you@homestead"
bash init.sh
vagrant up
vagrant ssh


vagrant@homestead:~/code$
composer global require laravel/installer
laravel new blog


search nodepad 
run as administration
open system32/hosts
192.168.10.10 	blog.test  		and save




https://www.phpmyadmin.net/downloads/
extract into user/shakil
user:homestead
pass:secret
utf8_general_ci



//.yaml
folders:
    - map: E:/shakil
      to: /home/vagrant/shakil
    - map: C:\Users\Shakil\phpmyadmin
      to: /home/vagrant/phpmyadmin
    - map: E:/shakil/blog
      to: /home/vagrant/blog
sites:
    - map: phpmyadmin.test
      to: /home/vagrant/phpmyadmin
    - map: blog.test
      to: /home/vagrant/blog/public