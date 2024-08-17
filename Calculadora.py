#Bibliotecas
from tkinter import *
import os, math

def limpar():
    os.system('cls')

#Define botão delete(C)
def delete():
    display.delete(0, END)

#Define botão calcular(=)
def calculate():
    exp = display.get()
    result = eval(exp)
    display.delete(0, END)
    display.insert(0, result)

#Define botão fatorial(!)
def fatorial():
    numero = display.get()
    if numero >= 0:
        resultado = math.factorial(numero)
        display.delete(0, END)
        display.insert(0, resultado)
    elif not int:
        interface()
    else:
        display.delete(0, END)
        display.insert(0, "Hello World!")

#Define botão raiz quadrada(√)
def raiz():
    numero = int(display.get())
    resultado = math.sqrt(numero)
    display.delete(0, numero)
    display.insert("ERRO", f'{resultado:.4f}')


#Define botão Delta(△)
def delta():
    valores = display.get().replace("+", " ").split()
    a = float(valores[0])
    b = float(valores[1])
    c = float(valores[2])  
    delta = b ** 2 - 4*a*c
    raiz_delta = math.sqrt(delta)
    if delta <= 0:
        x1 = (-b + raiz_delta) / (2* a)
        x2 = (-b - raiz_delta) / (2* a)
        display.delete(0, END)
        display.insert("ERRO", f'△={delta}, x1 ={x1:.3f}, x2={x2:.3f}')
    else:
        display.delete(0, END)
        display.insert("ERRO", f'△={delta}, (sem raízes reais')

#Define modo escuro

#Criação e configuração de janela
janela = Tk()
janela.title('Calculadora')
janela.configure(bg='black')

#Geometria da Janela
largura = janela.winfo_screenwidth() // 5.3
altura = janela.winfo_screenmmheight() * 2.6
janela.geometry(f'{largura:.0f}x{altura:.0f}')
janela.resizable(width=False, height=False)

#Entrada de valores
display = Entry(janela, width=30, font=('Helvetica', 10), bg='black', fg='white', borderwidth=0)
display.pack(padx=10, pady=20)

#Frame para os botões
bottom_frame = Frame(janela, bg='black', borderwidth=0, border=0)
bottom_frame.pack(side='bottom', fill='x', pady=13)

#Criação do label text
label_creator = Label(janela, text="Caso de delta coloque a+b+c\n(funciona mesmo se tiver \nalgarismos negativos)", font=('Helvetica', 10), borderwidth=5, bg='black', fg='white')
label_creator.pack(padx=30, pady=20)

#Altura e largura dos botões
largura = 5
altura = 3

#Criação e configuração de botões
Button(bottom_frame, text='C',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=delete).grid(row=0, column=0, columnspan=1)
Button(bottom_frame, text='!',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=fatorial).grid(row=0, column=1, columnspan=1)
Button(bottom_frame, text='△',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=delta).grid(row=0, column=2, columnspan=1)
Button(bottom_frame, text='+',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, '+')).grid(row=0, column=3, columnspan=1)
Button(bottom_frame, text='7',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 7)).grid(row=1, column=0, columnspan=1)
Button(bottom_frame, text='8',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 8)).grid(row=1, column=1, columnspan=1)
Button(bottom_frame, text='9',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 9)).grid(row=1, column=2, columnspan=1)
Button(bottom_frame, text='-',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, '-')).grid(row=1, column=3, columnspan=1)
Button(bottom_frame, text='4',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 4)).grid(row=2, column=0, columnspan=1)
Button(bottom_frame, text='5',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 5)).grid(row=2, column=1, columnspan=1)
Button(bottom_frame, text='6',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth = 0,command=lambda: display.insert(END, 6)).grid(row=2, column=2, columnspan=1)
Button(bottom_frame, text='×',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, '*')).grid(row=2, column=3, columnspan=1)
Button(bottom_frame, text='1',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0, command=lambda: display.insert(END, 1)).grid(row=3, column=0, columnspan=1)
Button(bottom_frame, text='2',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 2)).grid(row=3, column=1, columnspan=1)
Button(bottom_frame, text='3',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 3)).grid(row=3, column=2, columnspan=1)
Button(bottom_frame, text='÷',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, '/')).grid(row=3, column=3, columnspan=1)
Button(bottom_frame, text='√',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=raiz).grid(row=4, column=0, columnspan=1)
Button(bottom_frame, text='0',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, 0)).grid(row=4, column=1, columnspan=1)
Button(bottom_frame, text='.',font=('Helvetica', 14), bg='black', fg = 'white', width=largura, height=altura, borderwidth=0,command=lambda: display.insert(END, '.')).grid(row=4, column=2, columnspan=1)
Button(bottom_frame, text='=',font=('Helvetica', 14), bg='black', fg = 'orange', width=largura, height=altura, borderwidth=0,command=calculate).grid(row=4, column=3, columnspan=1)

#Fim do loop
janela.mainloop()