USE jobsearch_db;

INSERT INTO company_profile (id, cmp_name, cmp_logo, industry, cmp_size, headquarters) VALUES
(1, 'Amazon', 'A', 'E-commerce/Tech', '10000+', 'Seattle, WA'), 
(2, 'Google', 'G', 'Technology', '10000+', 'Mountain View, CA'), 
(3, 'Dribbble', 'D', 'Design/Creative', '100-500', 'New York, NY'), 
(4, 'Twitter (X)', 'T', 'Social Media/Tech', '1000+', 'San Francisco, CA'), 
(5, 'Airbnb', 'B', 'Hospitality/Tech', '5000+', 'San Francisco, CA'), 
(6, 'Apple', 'P', 'Technology/Hardware', '10000+', 'Cupertino, CA'),
(7, 'Snapchat','S','Design/Creative','10000+','Mumbai, BOM'),
(8,'Tata','Z','Medical/Pharma','10000+','Mumbai, BOM')
ON DUPLICATE KEY UPDATE 
    cmp_name=VALUES(cmp_name), 
    cmp_logo=VALUES(cmp_logo);
INSERT INTO job_offers (id, cmp_id, cmp_name, job_name, location, posted_date, job_type, work_type, exp_yrs, salary) VALUES
(1, 1, 'Amazon', 'Senior UI/UX Designer', 'San Francisco, CA', '2023-05-20 10:00:00', 'Part time', 'Distant', 'Senior level', 250.00),
(2, 2, 'Google', 'Junior UI/UX Designer', 'California, CA', '2023-02-04 15:30:00', 'Full time', 'Distant', 'Junior level', 150.00),
(3, 3, 'Dribbble', 'Senior Motion Designer', 'New York, NY', '2023-01-29 09:00:00', 'Part time', 'Shift work', 'Senior level', 260.00),
(4, 4, 'Twitter (X)', 'UX Designer', 'California, CA', '2023-04-11 11:45:00', 'Full time', 'Distant', 'Middle level', 120.00),
(5, 5, 'Airbnb', 'Graphic Designer', 'New York, NY', '2023-04-02 08:20:00', 'Part time', 'On-site', 'Senior level', 300.00),
(6, 6, 'Apple', 'Graphic Designer', 'San Francisco, CA', '2023-01-18 14:00:00', 'Part time', 'Distant', 'Middle level', 140.00),
(7, 7,'Snapchat','Graphic Designer','Mumbai, BOM','2025-10-30 09:45:00','Full time','Distant','Senior level',1000.00),
(8, 8,'Tata','UI/UX Designer','Mumbai, BOM','2025-10-30 16:30:00','Part time','Distant','Middle level',1250.00)
ON DUPLICATE KEY UPDATE 
    cmp_id=VALUES(cmp_id),
    job_name=VALUES(job_name);