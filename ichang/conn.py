from __future__ import print_function
import mysql.connector

cnx = mysql.connector.connect(user='root', database='ichang')
cursor = cnx.cursor()

#add_employee = ("INSERT INTO users "
#               "(id, username, password, admin) "
#              "VALUES (%s, %s, %s, %s)")

read_users = ("select * from users")			   
#data_employee = ('1', 'sam', 'dryeam', '1')

# Insert new employee
# cursor.execute(add_employee, data_employee)
cursor.execute(read_users)
data = cursor.fetchall()
for row in data:
	one = row[0]
	two = row[1]
	three = row[2]
	four = row[3]
	print ("Id id %s, username is %s, password is ****, is admin? %s" % (one,two,four))

# Make sure data is committed to the database
# cnx.commit()

cursor.close()
cnx.close()