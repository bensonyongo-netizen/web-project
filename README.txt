
OIT 237 — Web Programming
Assignment 1 & 2 Solution Pack
Generated: 2025-08-31 10:07

STRUCTURE
=========
/index.html                 -> Homepage (Parts 1–4 & JavaScript footer)
/assets/css/styles.css      -> Stylesheet (Part 3 + 4)
/assets/js/script.js        -> JS to show page location & last modified (Part 3)
/assets/images/*.png        -> Local images (Part 3)
/forms/form.html            -> Part 5a form
/forms/process.php          -> Inserts submission into MySQL
/forms/db.php               -> PDO connection (edit credentials here)
/forms/retrieve.php         -> Shows records; contains inline login form (Part 5b)
/forms/login.php            -> Handles login
/forms/logout.php           -> Ends session
/forms/seed_admin.php       -> Run once to create admin user (admin/admin123)
/sql/database.sql           -> Exported database (schema) in SQL format

SETUP (LOCAL WITH XAMPP/WAMP/LAMPP)
===================================
1) Copy the whole folder to your web root, e.g.:
   - Windows (XAMPP): C:\xampp\htdocs\OIT237_Web_Assignment
   - Linux (LAMPP):   /opt/lampp/htdocs/OIT237_Web_Assignment
   - macOS (MAMP):    /Applications/MAMP/htdocs/OIT237_Web_Assignment

2) Create the database:
   - Open phpMyAdmin and run the SQL in /sql/database.sql
   - Alternatively, run from CLI:
       mysql -u root -p < /path/to/sql/database.sql

3) Edit /forms/db.php to match your MySQL credentials.

4) Seed login user:
   - Visit http://localhost/OIT237_Web_Assignment/forms/seed_admin.php
   - This creates username 'admin' with password 'admin123'.

5) Test the form:
   - Open http://localhost/OIT237_Web_Assignment/forms/form.html
   - Submit a few entries.

6) Retrieve (requires login):
   - Open http://localhost/OIT237_Web_Assignment/forms/retrieve.php
   - Log in as admin/admin123 to view records.

HOSTING (PART 6)
================
- Deploy on a free PHP host with MySQL (e.g., 000webhost, InfinityFree).
- Upload the entire folder via File Manager or FTP.
- Create a MySQL database on the host, import /sql/database.sql, and update /forms/db.php.
- Re-run /forms/seed_admin.php once online to create the admin user.

VALIDATION (PART 4)
===================
- Use https://validator.w3.org/ to validate index.html (HTML5 DOCTYPE is already set).
- Fix any warnings suggested by the validator (if any).

NOTES
=====
- All required features are demonstrated: personal info, internal & external links,
  formatted text, list(s), multiple sections, images (local), table with multi-line rows,
  JavaScript footer with page location and last modified, external stylesheet, and PHP+MySQL form with login for retrieval.
- Replace placeholder text and images with your real content as desired.
