Company profile --
main includes the profile page of each company
profile edit includes the form through which the company can edit its profile

Job offer --
displays the job offer for each company so if any company wants to add a new offer they can do so
In this page we'll have to integrate the no. of applicants and their info(not done yet)

cmp_logos --
stores the logo and cover pics of each company

listings --
where the applicant would see all the options

job_search -- dbname

---sql create table query
CREATE TABLE company_profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cmp_name VARCHAR(255) NOT NULL,
    cmp_logo VARCHAR(255),
    overview TEXT,
    website VARCHAR(255),
    industry VARCHAR(255),
    cmp_size VARCHAR(100),
    headquarters VARCHAR(255),
    special TEXT,
    achieve TEXT
);

CREATE TABLE job_offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cmp_name VARCHAR(255) NOT NULL,
    job_name VARCHAR(255) NOT NULL,
    location VARCHAR(255),
    responsibilities TEXT,
    requirements TEXT,
    posted_date DATETIME DEFAULT CURRENT_DATE,
    job_type VARCHAR(100),
    work_type VARCHAR(100),
    exp_yrs VARCHAR(50),
    salary DECIMAL(15,2),
    about TEXT,
    applicants_count INT DEFAULT 0,
    cmp_id INT,
    FOREIGN KEY (cmp_id) REFERENCES company_profile(id) ON DELETE CASCADE 
);


CREATE TABLE applicant_profile (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    pwd VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    pronouns VARCHAR(30) DEFAULT 'Prefer not to say',
    about TEXT DEFAULT NULL,
    experience TEXT DEFAULT NULL,
    education TEXT DEFAULT NULL,
    skills TEXT DEFAULT NULL,
    pdf INT(1) NOT NULL DEFAULT 0,
    achievements TEXT DEFAULT NULL,
    goals TEXT DEFAULT NULL
);

