<?php
 
use Illuminate\Database\Seeder;
 
class AZDatabaseTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('az_database')->delete();
 
        $projects = array(
            [
		'id' => '1', 
		'name' => 'Proquest European Business', 
		'description' => 'This database contains the latest European business and financial information. Includes quality resources such as The Economist, Fortune and European Business Journal.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '2', 
		'name' => 'EBL Ebook Library', 
		'description' => 'EBL Ebook Library covers a wide range of subjects.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '3', 
		'name' => 'EdITLib Digital Library', 
		'description' => 'The EdITLib Digital Library contains full text peer-reviewed articles and conference papers on the latest research, developments, and applications related to all aspects of Educational Technology and E-Learning. Published by the Association for the Advancement of Computing in Education. Full text is generally available from 2000.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '4', 
		'name' => 'Gale Databases', 
		'description' => 'Includes nearly 30 databases including the multi-disciplinary Academic OneFile and Expanded Academic ASAP, Contemporary Authors, Contemporary Literary Criticism, Gale Virtual Reference Library, and a range of subject databases.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '5', 
		'name' => 'Google Scholar', 
		'description' => 'Google Scholar provides a simple way to broadly search for scholarly literature. You can search across many disciplines and sources: peer-reviewed papers, theses, books, abstracts and articles, from academic publishers, professional societies, preprint repositories, universities and other scholarly organizations.
Note! You can set up the full text service to work with Google Scholar - you will need to do this to link to full text from off campus',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '6', 
		'name' => 'Knovel', 
		'description' => 'Knovel is a collection of over 500 online full -content books covering a range of subjects in science, technology and engineering. Many Knovel books are enhanced with interactive graphs, tables and spreadsheets. You have access to all standard content and to premium content published up to 2004.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '7', 
		'name' => 'MAS Ultra', 
		'description' => 'Provides full text nearly 600 popular general interest and current events publications with information dating back as far as 1975 for key magazines. MAS Ultra – School Edition also provides more than 500 full text pamphlets, 268 full text reference books, 84,606 biographies, 88,463 primary source documents, and an Image Collection of 107,135 photos, maps and flags.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '8', 
		'name' => 'Mental Measurements Yearbook with Tests in Print (EBSCOhost)', 
		'description' => 'Limit of 1 simultaneous user
Mental Measurements Yearbook, produced by the Buros Institute at the University of Nebraska, provides users with a comprehensive guide to over 2,000 contemporary testing instruments. Designed for an audience ranging from novice test consumers to experienced professionals, the MMY series contains information essential for a complete evaluation of test products within such diverse areas as psychology, education, business, and leadership. First published by Oscar K. Buros, the MMY series allows users to make knowledgeable judgments and informed selection decisions about the increasingly complex world of testing. MMY provides coverage from Volume 9 to the present.
Also produced by the Buros Institute of Mental Measurements at the University of Nebraska, Tests in Print (TIP) serves as a comprehensive bibliography to all known commercially available tests that are currently in print in the English language. TIP provides vital information to users including test purpose, test publisher, in-print status, price, test acronym, intended test population, administration times, publication date(s), and test author(s).',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            [
		'id' => '9', 
		'name' => 'TechXtra', 
		'description' => 'TechXtra is a free service which can help you find articles, books, the best websites, the latest industry news, job announcements, technical reports, technical data, full text eprints, the latest research, thesis & dissertations, teaching and learning resources and more, in engineering, mathematics and computing.',
		'time' => '2002-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://search.proquest.com/europeanbusiness/fromDatabasesLayer?accountid=14205',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime
	    ],
            ['id' => '10', 
		'name' => 'Business & Company ASAP', 
		'description' => 'Business and trade journals, newspapers and company directory profiles with full text and images. Subjects include companies, markets and industries, market trends, mergers and acquisitions, management theory and company overviews.',
		'time' => '1999-',
		'url' => 'http://ezproxy.lib.swin.edu.au/login?url=http://find.galegroup.com/menu/start?userGroupName=swinburne1&prod=BCPM',
		'url_alt' => '',
		'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('az_database')->insert($projects);
    }
 
}
