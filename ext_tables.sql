#
# Table structure for table 'pages'
#
CREATE TABLE pages (

	page int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	navigation_title varchar(255) DEFAULT '' NOT NULL,
	layout int(11) DEFAULT '0' NOT NULL,
	hide_in_menu int(11) DEFAULT '0' NOT NULL,
	parent int(11) unsigned DEFAULT '0' NOT NULL,
	sub_pages int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	name varchar(255) DEFAULT '' NOT NULL,
	hidden int(11) DEFAULT '0' NOT NULL,
	page int(11) unsigned DEFAULT '0',

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	text text NOT NULL,

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	image text NOT NULL,

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (

	text text NOT NULL,
	image text NOT NULL,

);

#
# Table structure for table 'pages'
#
CREATE TABLE pages (

	page  int(11) unsigned DEFAULT '0' NOT NULL,

);