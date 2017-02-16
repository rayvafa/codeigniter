
drop table issues;

drop table publications;

create table publications (
  publication_id INT NOT NULL,
  publication_name VARCHAR(200) NOT NULL,
  primary key ( publication_id )
);

create table issues (
  issue_id INT NOT NULL,
  publication_id INT NOT NULL,
  issue_number INT NOT NULL,
  issue_date_publication VARCHAR(100) NOT NULL,
  issue_cover VARCHAR(200) NULL,
  primary key ( issue_id ),
  foreign key ( publication_id ) references publications(publication_id)
);
