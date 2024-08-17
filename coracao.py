#Imporatação das bibliotecas
from turtle import *
import math

#Criação da conta para formato do coração
def hearta(e):
    return 15*math.sin(e)**3
def heartb(e):
        return 12*math.cos(e)-5*\
        math.cos(2*e)-2*\
        math.cos (3*e)-\
        math.cos(4*e)

speed(900000000)
bgcolor('black')
pensize(4)

for i in range(6000):
    goto(hearta(i)*20, heartb(i)*20)
    for j in range(5):
        color('red')
    goto(0,0)
done()