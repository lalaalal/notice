# 7반 알림장

Apache, php, mysql

https://github.com/lalaalal/notice/blob/release/etc/my.sql

INSERT QUERY
```
$insert_query = "INSERT INTO {$_POST['add']} (name) VALUES (\"{$_POST['name']}\")";
```

```
$insert_board_query = "INSERT INTO board (title, subject_id, category_id, body, start, deadline)
              VALUES (
                \"{$_POST['title']}\",
                {$_POST['subject_id']},
                {$_POST['category_id']},
                \"{$_POST['body']}\",
                {$_POST['start']},
                {$_POST['deadline']}
              )";
```

UPDATE QUERY
```
$update_board_query = "UPDATE board SET
              title = \"{$_POST['title']}\",
              subject_id = {$_POST['subject_id']},
              category_id = {$_POST['category_id']},
              body = \"{$_POST['body']}\",
              start = {$_POST['start']},
              deadline = {$_POST['deadline']}
              WHERE no = {$_GET['param']}";
```

DELETE QUERY
```
$delete_board_query = "DELETE FROM board WHERE no = {$_GET['param']}";
```

SELECT
```
SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
FROM board
LEFT JOIN category ON category_id = category.id
LEFT JOIN subject ON subject_id = subject.id
WHERE deadline >= NOW();
```
