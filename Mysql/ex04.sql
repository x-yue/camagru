UPDATE ft_table SET creation_date = DATE_ADD(creation_date, INTERVAL 20 YEAR) WHERE ft_table.id > 5;
