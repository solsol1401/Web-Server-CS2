import sqlite3

# Create a connection to the SQLite database
conn = sqlite3.connect('users.db')
c = conn.cursor()

# Create a table to store user data
c.execute('''CREATE TABLE IF NOT EXISTS users
             (name TEXT, username TEXT PRIMARY KEY, password TEXT)''')

# Close the connection
conn.close()

# Create Restaurants database
conn_restaurants = sqlite3.connect('restaurants.db')
c_restaurants = conn_restaurants.cursor()
c_restaurants.execute('''CREATE TABLE IF NOT EXISTS bookings
                        (id INTEGER PRIMARY KEY AUTOINCREMENT,
                         date TEXT,
                         time TEXT,
                         name TEXT,
                         contact TEXT)''')
conn_restaurants.close()

# Create Bowling database
conn_bowling = sqlite3.connect('bowling.db')
c_bowling = conn_bowling.cursor()
c_bowling.execute('''CREATE TABLE IF NOT EXISTS bookings
                     (id INTEGER PRIMARY KEY AUTOINCREMENT,
                      date TEXT,
                      time TEXT,
                      lane INTEGER,
                      name TEXT,
                      contact TEXT)''')
conn_bowling.close()

# Create Bicycles database
conn_bicycles = sqlite3.connect('bicycles.db')
c_bicycles = conn_bicycles.cursor()
c_bicycles.execute('''CREATE TABLE IF NOT EXISTS bookings
                      (id INTEGER PRIMARY KEY AUTOINCREMENT,
                       date TEXT,
                       time TEXT,
                       name TEXT,
                       contact TEXT)''')
conn_bicycles.close()
