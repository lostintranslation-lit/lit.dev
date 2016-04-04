-- code for selecting the luis file

SELECT img_file 
FROM luis 
WHERE id IN(
	SELECT luis_score
	FROM lit 
	WHERE id = 1
);