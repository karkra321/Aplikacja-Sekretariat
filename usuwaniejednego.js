function usuwaniejednego(id)
{
	answer=window.confirm("Ta akcja usunie ucznia z bazy danych.\nJestes pewien ?");
	if(answer) window.location.href = "usun.php?id="+id+"";
}