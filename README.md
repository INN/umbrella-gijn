## Setup instructions

This repository is designed to be set up in accordance with the VVV install instructions in INN/docs, that were introduced with https://github.com/INN/docs/pull/148


```
vv create
```

Prompt | Text to enter 
------------ | -------------
Name of new site directory: | gijn
Blueprint to use (leave blank for none or use largo): | largo
Domain to use (leave blank for largo-umbrella.dev): | gijn.dev
WordPress version to install (leave blank for latest version or trunk for trunk/nightly version): | *hit [Enter]*
Install as multisite? (y/N): | y
Install as subdomain or subdirectory? : | subdomain
Git repo to clone as wp-content (leave blank to skip): | *hit [Enter]*
Local SQL file to import for database (leave blank to skip): | *This directory must be an absolute path, so the easiest thing to do on a Mac is to drag your mysql file into your terminal window here: the absolute filepath with fill itself in.*
Remove default themes and plugins? (y/N): | y
Add sample content to site (y/N): | N
Enable WP_DEBUG and WP_DEBUG_LOG (y/N): | N

After reviewing the options and creating the new install, partake in the following steps:

1. `cd` to the directory `gijn/` in your VVV setup
2. `git clone git@github.com:INN/umbrella-gijn.git`
3. `cd umbrella-gijn`
4. `git submodule update --init` to pull down all of the submodules you need (including, crucially, the tools repo)
5. `cd ..`
6. Copy the contents of the new directory `umbrella-gijn/` into `htdocs/`, including all hidden files whose names start with `.` periods.
	- the easy way to do this is: `rsync -rv umbrella-gijn/ htdocs`
	- after doing this you may want to `rm -rf umbrella-gijn` to save disk space
7. `cd htdocs` to move to the folder where the umbrella now lives
8. `workon fabric`
9. `fab production wp.fetch_sql_dump` (or download via FTP if this doesn't work)
10. `fab vagrant.reload_db:mysql.sql`
11. Search and replace 'gijn.wpengine.com' --> 'TKTKNAME.dev' in the db (options for doing this are covered in the [largo umbrella setup instructions](https://github.com/INN/docs/blob/master/projects/largo/umbrella-setup.md)
12. Optionally, you may want to pull down recent uploads so you have images, etc. to work with locally.
13. Visit gijn.dev in your browser and you should see the site!

## Creating new sites for conferences:

Each conference site is a site within the multisite network.

1. Gain access to hosting dashboard
2. Run a backup
3. Add desired domain under "Domains" tab
	* It will likely take a few hours for the DNS status to update to green
4. Under the "CDN" tab, ensure that Enable CDN is checked ✅ for your new domain
5. "Network activate" the [MultiSite Clone Duplicator](https://wordpress.org/plugins/multisite-clone-duplicator/) plugin
6. Duplicate the most-recent conference site for that conference series
	* Use largo@inn.org for the admin email address
7. If needed, set up a domain mapping for the subdomain, if the conference uses a domain other than `gijn.org`

