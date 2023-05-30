import sqlite3

# Create a connection to the SQLite database
conn = sqlite3.connect('users.db')
c = conn.cursor()

# Create a table to store user data
c.execute('''CREATE TABLE IF NOT EXISTS users
             (name TEXT, username TEXT PRIMARY KEY, password TEXT)''')

# Close the connection
conn.close()
