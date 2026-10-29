ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'viewer';
UPDATE users SET role='admin' WHERE username='admin';