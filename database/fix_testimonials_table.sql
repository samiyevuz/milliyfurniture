-- Fix testimonials table structure
-- Run this SQL in MySQL to fix the table structure

-- 1. Check current structure
DESCRIBE testimonials;

-- 2. If 'text' column exists, rename it to 'description'
ALTER TABLE testimonials 
CHANGE COLUMN text description TEXT NOT NULL DEFAULT '';

-- 3. If 'text' column doesn't exist but 'description' is missing, add it
-- ALTER TABLE testimonials 
-- ADD COLUMN description TEXT NOT NULL DEFAULT '' AFTER title;

-- 4. Ensure all required columns exist with proper defaults
ALTER TABLE testimonials 
MODIFY COLUMN title VARCHAR(255) NOT NULL DEFAULT '',
MODIFY COLUMN description TEXT NOT NULL DEFAULT '',
MODIFY COLUMN image VARCHAR(255) NULL,
MODIFY COLUMN step_number INT NOT NULL DEFAULT 1,
MODIFY COLUMN status TINYINT(1) NOT NULL DEFAULT 1,
MODIFY COLUMN `order` INT NOT NULL DEFAULT 0;

-- 5. Add missing columns if they don't exist
-- (Run these only if columns are missing)

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS title VARCHAR(255) NOT NULL DEFAULT '' AFTER id;

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS description TEXT NOT NULL DEFAULT '' AFTER title;

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS image VARCHAR(255) NULL AFTER description;

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS step_number INT NOT NULL DEFAULT 1 AFTER image;

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS status TINYINT(1) NOT NULL DEFAULT 1 AFTER step_number;

-- ALTER TABLE testimonials 
-- ADD COLUMN IF NOT EXISTS `order` INT NOT NULL DEFAULT 0 AFTER status;
