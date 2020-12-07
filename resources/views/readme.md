
for global
command prompt a jao

C:\Users\Shakil>homestead ssh //machine on like php artisan serve
vagrant@homestead:~$ //ekhane jabe
cd shakil
vagrant@homestead:~/shakil$

vagrant@homestead:~/shakil/blog$ //ekhane laravel project command

///for latest homestead file
C:\Users\Shakil>homestead up
C:\Users\Shakil>homestead reload --provision

//logout
vagrant@homestead:~/shakil$ exit

//homestead close
C:\Users\Shakil>homestead halt

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

system32/hosts
192.168.10.10 phpmyadmin.test
192.168.10.10 blog.test






project make>.ymal>-->system 32>






//anywhere
vagrat -v
cd ~  //root directory
git .bat ta dekho
vagrant@homestead:~$
rm -rf code //code namer folder remove hobe

kono folder a git bash open koro
touch index.php
laravel //laravel installer ve







go to user
cd ~
vagrant box add laravel/homestead
git clone https://github.com/laravel/homestead.git ~/Homestead
cd ~/Homestead

Shakil@FSL-01 MINGW64 ~/Homestead (master)
git checkout release
bash init.sh
code.
///generate ssh key
ssh-keygen -t rsa -C "you@homestead"
vagrant up
vagrant ssh

//nicher line gulor use janina
go to homestead:/home by following command
cd .. 
vagrant@homestead:/home$


go to manualy to Homestead folder and open git bash
make a folder in shakil >web
then make change in vs code of homestead.yml file
folders:
    - map: ~/web
      to: /home/vagrant/code

//yml file change holei run 
Shakil@FSL-01 MINGW64 ~/Homestead (release)
vagrant reload --provision

vagrant@homestead:~/code$exit  //dile
Shakil@FSL-01 MINGW64 ~/Homestead (release)

Shakil@FSL-01 MINGW64 ~/Homestead (release)
vagrant ssh  //ei command dile
vagrant@homestead:~$ //ekhane asbe
cd code //dile 
vagrant@homestead:~/code$  ekhane asbe

vagrant@homestead:~/code$
composer global require laravel/installer
laravel new blog



sites:
     - map: blog.test
      to: /home/vagrant/code/blog/public

search nodepad 
run as administration
open system32/hosts
192.168.10.10 	blog.test  		and save




