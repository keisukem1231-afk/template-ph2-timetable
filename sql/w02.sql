-- W2 POSSE課題：index.html の区画7〜11と同じ結果を返す SQL を書く
-- 書いた SQL は db コンテナの psql（docker compose exec db psql -U posse -d timetable）で実行し、
-- 表示が index.html の区画と一致することを確かめてから書くこと
-- 曜日（day）は数字のまま返してよい

-- 区画7：すべての授業と教室の情報（科目コードの順）
select * from rooms r
join courses c on r.code = c.room
order by r.code asc;

-- 区画8：曜日ごとの授業数（曜日の順）
select day ,count(*) from courses
group by day
order by day;

-- 区画9：建物ごとの授業数と合計単位（建物名の順）
select building, count(*) ,sum(credits) as building_credits  
from rooms r join courses c on r.code = c.room 
group by building 
order by building;

-- 区画10：授業を3つ以上担当している教員（授業数の多い順、同数なら名前の順）
select teacher, count(*) as teacher_courses from courses 
group by teacher 
having count(*) >= 3 
order by teacher_courses, teacher asc;

-- 区画11：授業が1つも入っていない教室（教室コードの順）
select r.code from rooms r 
left  join courses c on r.code = c.room 
where name is null 
order by r.code;
