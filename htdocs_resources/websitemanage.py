import tkinter as tk
from tkinter import ttk
import json

LARGE_FONT = ("Verdana",16)
class Window(tk.Tk):
    def __init__(self):
        tk.Tk.__init__(self)
        tk.Tk.wm_title(self,"Website Control")

        container = tk.Frame(self)
        container.pack(side="top",fill="both",expand=True)
        container.grid_rowconfigure(0,weight=1)
        container.grid_columnconfigure(0,weight=1)

        self.frames = {}
        frame1 = MainInterface(container,self)
        self.frames[MainInterface] = frame1
        frame1.grid(row=0,column=0,sticky="nsew")
        self.showFrame(MainInterface)

    def showFrame(self,cont):
        frame = self.frames[cont]
        frame.tkraise()

class MainInterface(tk.Frame):
    def __init__(self,parent,controller):
        tk.Frame.__init__(self,parent)
        label = ttk.Label(self,text="Website Control System",font=LARGE_FONT)
        label.pack(pady=10,padx=10)

        self.statusLabel = ttk.Label(self,text="Website Status:")
        self.statusLabel.pack(pady=5,padx=5)

        ## Current website Status (Online/Under Maintenance)
        self.currentStatus = tk.Label(self,text=self.status("maintenance",0))
        self.currentStatus.pack(pady=5,padx=5)

        ## Button changes website status
        self.changeButton = tk.Button(self,text=None,command=lambda:self.switchWebsiteStatus("maintenance"),fg=None)
        self.changeButton.pack(pady=5,padx=5)
        if self.status("maintenance",1):
            self.setButtonText("Switch On")
            self.setLabelFg("red")
        else:
            self.setButtonText("Switch Off")
            self.setLabelFg("green")

    def setLabelText(self,string):
        self.currentStatus.configure(text=string)

    def setButtonText(self,string):
        self.changeButton.configure(text=string)

    def setLabelFg(self,color):
        self.currentStatus.configure(fg=color)

    def status(self,var,dataFormat):
        ## if dataFormat = 0 -> String ; dataFormat = 1 -> Boolean
        with open("status.json","r") as f:
            status = json.loads(f.read())
            if status[var]:
                if dataFormat:
                    return True
                elif not dataFormat:
                    return "Under Maintenance"
            elif not status[var]:
                if dataFormat:
                    return False
                elif not dataFormat:
                    return "Online"

    def switchWebsiteStatus(self,var):
        if var=="maintenance":
            with open("status.json","r+") as f:
                jsonData = json.loads(f.read())
                if jsonData["maintenance"]:
                    jsonData["maintenance"] = 0
                    self.setLabelText("Online")
                    self.setLabelFg("green")
                    self.setButtonText("Switch Off")
                else:
                    jsonData["maintenance"] = 1
                    self.setLabelText("Under Maintenance")
                    self.setLabelFg("red")
                    self.setButtonText("Switch On")

                f.seek(0) ## Improtant to overwrite from beginning
                f.write(json.dumps(jsonData))
                f.truncate()
  
app = Window()
app.mainloop()
