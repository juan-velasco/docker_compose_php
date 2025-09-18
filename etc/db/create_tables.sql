CREATE TABLE IF NOT EXISTS books (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL
);

INSERT INTO books (title, author) VALUES
('The Pragmatic Programmer', 'Andrew Hunt'),
('Clean Code', 'Robert C. Martin');

CREATE TABLE IF NOT EXISTS movies (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL
);

INSERT INTO movies (title, director) VALUES
('Star Wars', 'George Lucas'),
('The Godfather', 'Francis Ford Coppola');
