import mysql.connector

def connectToDb():
    mydb = mysql.connector.connect(
        host="bino1jjljg7soefvrjiq-mysql.services.clever-cloud.com",
        user="utwbhpnykdwthejb",
        password="q9Ddj5miAPLOf4nBLJlM",
        database="bino1jjljg7soefvrjiq")
    return mydb