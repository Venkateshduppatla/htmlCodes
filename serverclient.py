import asyncio
import websockets
 
clientAddresses = []
chatHistory = []
async def receiveMesage(websocket):
	clientAddresses.append(websocket)
	for message in chatHistory:
		await websocket.send(message)
	while True:
		message = await websocket.recv()
		chatHistory.append(message)
		for clientAddress in clientAddresses:
			await clientAddress.send(message)
 
start_server = websockets.serve(receiveMesage, "localhost", 7778)
asyncio.get_event_loop().run_until_complete(start_server)
asyncio.get_event_loop().run_forever()


# from threading import Thread
# from socket import *
# addressList = []
# chatHistory = []
# def forwardReceviedMessages(client, name):
#     while True:
#         message = client.recv(1024).decode()
#         chatHistory.append(message)
#         sendAll(message)
# def sendAll(message):
#     for address in addressList:
#         address.send(str.encode(message))
# # serverIpAdress = '192.168.0.103'
# serverIpAdress = 'localhost'
# serverPort = 7778
# serverSocket = socket(AF_INET,SOCK_STREAM)
# print("waiting....")
# serverSocket.bind((serverIpAdress, serverPort))
# serverSocket.listen()
# while True:
#     clientSocket, clientAddress = serverSocket.accept()
#     name = clientSocket.recv(1024).decode()
#     # joiningMessage = ""
#     sendAll(name + " joined\n")
#     for chat in chatHistory:
#         clientSocket.send(str.encode(chat + "\n"))
#     addressList.append(clientSocket)
#     print("Connented with: ", clientAddress)
#     # print(chatHistory)
#     Thread(target = forwardReceviedMessages, args = (clientSocket, name)).start()



# # Bank Customers Details 

# import mysql.connector
# import pandas as pd

# fileName = "bankCustomersDetails.db"


# class CRUDS:
# 	def _init_(self):
# 		self.connection = mysql.connector.connect(host = '165.22.14.77', user = '', password = '', database = '')
# 		self.cursor = self.connection.cursor()

# 	def createRecord(self):
# 		self.cursor.execute("INSERT INTO bankCustomersDetails VALUES " + str((input("Enter Account Number: "), input("Enter Customer Name: "), input("Enter Balance: "), 'A')))
# 		self.connection.commit()

# 	def showAllActiveRecords(self):
# 		self.cursor.execute("SELECT * FROM bankCustomersDetails")
# 		records = self.cursor.fetchall()
# 		formatType = input("Select Format In Which Records Is To Be Displayed\n1. Form\n2. Table\nEnter Your Choice: ")
# 		if formatType == '1':
# 			for record in records:
# 				if record[3] == 'A':
# 					print()
# 					print("Account Number: " + record[0])
# 					print("Name: " + record[1])
# 					print("Balance:", record[2])

# 		elif formatType == '2':
# 			# print("Account Number", ' ' * 6, "Customer Name", ' ' * 7, "Balance", ' ' * 13, "Status", ' ' * 14)
# 			# print("-" * 80)
# 			# for record in records:
# 			# 	if record[3] == 'A':
# 			# 		print()
# 			# 		print(record[0], ' ' *(20 - len(record[0])), record[1],  ' ' *(20 - len(record[1])), record[2],  ' ' *(20 - len(record[2])), "Active")
# 			print (pd.read_sql("SELECT AccountNumber, Name, Balance FROM bankCustomersDetails  WHERE Status = 'A'", self.connection))
# 			# pd.DataFrame(records)			

# 	def showAllClosedRecords(self):
# 		self.cursor.execute("SELECT * FROM bankCustomersDetails")
# 		records = self.cursor.fetchall()
# 		formatType = input("Select Format In Which Records Is To Be Displayed\n1. Form\n2. Table\nEnter Your Choice: ")
# 		if formatType == '1':
# 			for record in records:
# 				if record[3] == 'C':
# 					print()
# 					print("Account Number: " + record[0])
# 					print("Name: " + record[1])
# 					print("Balance:", record[2])
# 		elif formatType == '2':
# 			print (pd.read_sql_query("SELECT AccountNumber, Name, Balance FROM bankCustomersDetails WHERE Status = 'C'", self.connection))
# 			# print("Account Number", ' ' * 6, "Customer Name", ' ' * 7, "Balance", ' ' * 13, "Status", ' ' * 14)
# 			# print("-" * 80)
# 			# for record in records:
# 			# 	if record[3] == 'C':
# 			# 		print()
# 			# 		print(record[0], ' ' *(20 - len(record[0])), record[1],  ' ' *(20 - len(record[1])), record[2],  ' ' *(20 - len(record[2])), "Active")


# 	def showAllRecords(self):
# 		self.cursor.execute("SELECT * FROM bankCustomersDetails")
# 		records = self.cursor.fetchall()
# 		formatType = input("Select Format In Which Records Is To Be Displayed\n1. Form\n2. Table\nEnter Your Choice: ")
# 		if formatType == '1':
# 			for record in records:
# 				print()
# 				print("Account Number: " + record[0])
# 				print("Name: " + record[1])
# 				print("Balance:" + record[2])
# 				if record[3] == 'A':
# 					print("Status: Active")
# 				elif record[3] == 'C':
# 					print("Status: Closed")

# 		elif formatType == '2':
# 			print("Account Number", ' ' * 6, "Customer Name", ' ' * 7, "Balance", ' ' * 13, "Status", ' ' * 14)
# 			print("-" * 80)
# 			for record in records:
# 				print()
# 				if record[3] == 'A':
# 					print(record[0], ' ' *(20 - len(record[0])), record[1],  ' ' *(20 - len(record[1])), record[2],  ' ' *(20 - len(record[2])), "Active")
# 				elif record[3] == 'C':
# 					print(record[0], ' ' *(20 - len(record[0])), record[1],  ' ' *(20 - len(record[1])), record[2],  ' ' *(20 - len(record[2])), "Closed")
# 			print (pd.read_sql_query("SELECT AccountNumber, Name, Balance FROM bankCustomersDetails", self.connection))

# 	def searchRecord(self):
# 		try:
# 			self.cursor.execute("SELECT * FROM bankCustomersDetails WHERE AccountNumber = %s " %(input("Enter Account Number To Search: ")))
# 			record = self.cursor.fetchone()
# 			print()
# 			print("Account Number:", record[0])
# 			print("Name:", record[1])
# 			print("Balance:", record[2])
# 			if record[3] == 'A':
# 				print("Status: Active")
# 			elif record[3] == 'C':
# 				print("Status: Closed")
# 		except:
# 			print("Data Not Found.")

# 	def updateRecord(self):
# 		try:
# 			self.cursor.execute("SELECT * FROM bankCustomersDetails WHERE AccountNumber = %s" %(accountToBeUpdated := input("Enter Account Number To Update: ")))
# 			record = self.cursor.fetchone()
# 			print()
# 			print("Account Number:", record[0])
# 			print("Name:", record[1])
# 			print("Balance:", record[2])
# 			print("\nEnter Details To Be Updated\n")
# 			self.cursor.execute("UPDATE bankCustomersDetails SET Name = '%s', Balance = '%s' WHERE AccountNumber = '%s' "%( input("Enter New Name: "), input("Enter New Balance: "), accountToBeUpdated))
# 			print("Total", self.cursor.rowcount, "Records Updated.")
# 			self.connection.commit()
# 		except:
# 			# print(error)
# 			print("Data Not Found.")

# 	def closeRecord(self):
# 		try:
# 			self.cursor.execute("SELECT * FROM bankCustomersDetails WHERE AccountNumber = %s " %(accountNumberToBeClosed := input("Enter Account Number To Close: ")))
# 			record = self.cursor.fetchone()
# 			print()
# 			print("Account Number:", record[0])
# 			print("Name:", record[1])
# 			print("Balance:", record[2])

# 			if '1' == input("Do You Close This Account? \n1. Yes\n2. No\nEnter Your Choice:"):
# 				self.cursor.execute("UPDATE bankCustomersDetails SET Status = 'C' WHERE AccountNumber = %s " %(accountNumberToBeClosed))
# 				print("Total", self.cursor.rowcount, "Records Closed.")
# 				self.connection.commit()
# 		except:
# 			print("Data Not Found.")

# 	def exit(self):
# 		self.cursor.close()
# 		self.connection.close()
# 		quit()
	
# cruds = CRUDS()


# while 1:
# 	functions = [cruds.createRecord, cruds.showAllActiveRecords, cruds.showAllClosedRecords, cruds.showAllRecords, cruds.searchRecord, cruds.updateRecord, cruds.closeRecord, cruds.exit]
# 	functions[int(input("\n1. Save Customer Record\n2. Show All Active Customers Records\n3. Show All Closed Customers Records\n4. Show All Customers Records \n5. Search Customer Record\n6. Update Customer Record\n7. Close Customer Record\n8. Exit\n----------------------\nEnter Your Choice: ")) - 1]()