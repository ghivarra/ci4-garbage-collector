# CodeIgniter 4 Garbage Collector
Sometimes, for whatever reason PHP original garbage collector just did not clean up expired session. This is the solution if you are having the same problem.

It happened for me too as I was surprised to see millions of expired sessions in my session folder, but worry not, you can use this controller files to create a cronjob.
If you don't know what cron is, kindly see this page https://wikipedia.org/wiki/Cron

# How to use
1. Copy Garbage.php files inside your controllers path usually in **/projectPath/app/Controllers/**
2. Edit **$pass** inside it with your own token
3. Create cronjob to run the script, you can use either PHP CLI or just casual wget for it e.g:

> 0 */6 * * * wget -O /dev/null https://yourdomain.com/garbage/delete?token=YOUR_OWN_TOKEN

# DONE!
your expired session will be deleted every 6 hours or even every minutes if you wanted to

# TRIVIA
Stop bullying the garbage collector, maybe the payment is just not good enough!
