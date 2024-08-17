#Biblioteca Flet
import flet as ft

# Variáveis globais para os widgets
codigo = None
data_cadastro = None
nome_paciente = None
sexo = None
nascimento = None
idade = None
estado_civil = None
profissao = None
naturalidade = None
cartao_sus = None
cpf = None
rg = None
pai = None
mae = None
endereco = None
numero = None
bairro = None
cep = None
cidade = None
uf = None
celular = None
telefone = None
empresa = None
observacoes = None

# Criação e configuração da janela
def janela(page: ft.Page):
    global codigo, data_cadastro, nome_paciente, sexo, nascimento, idade
    global estado_civil, profissao, naturalidade, cartao_sus, cpf, rg
    global pai, mae, endereco, numero, bairro, cep, cidade, uf, celular, telefone
    global empresa, observacoes

    page.title = 'Cadastro de Pacientes'
    
    # Adicionando widgets
    codigo = ft.TextField(label='Código', width=150)
    data_cadastro = ft.TextField(label='Data do\ncadastro', width=150)
    nome_paciente = ft.TextField(label='Nome do paciente', width=900)
    sexo = ft.Dropdown(width=150, label='Sexo', options=[
        ft.dropdown.Option("Masculino"),
        ft.dropdown.Option("Feminino")
    ])
    nascimento = ft.TextField(label='Nascimento', width=150)
    idade = ft.TextField(label='Idade', width=150)
    estado_civil = ft.Dropdown(width=150, label='Estado Civil', options=[
        ft.dropdown.Option("Casado"),
        ft.dropdown.Option("Solteiro"),
        ft.dropdown.Option("União estavel"),
        ft.dropdown.Option("Divorciado")
    ])
    profissao = ft.Dropdown(width=340, label='Profissão', options=[
        ft.dropdown.Option("Medico"),
        ft.dropdown.Option("Advogado"),
        ft.dropdown.Option("Engenheiro"),
        ft.dropdown.Option("Programador")
    ])
    naturalidade = ft.TextField(label='Naturalidade', width=350)
    cartao_sus = ft.TextField(label='Cartão SUS', width=350)
    cpf = ft.TextField(label='CPF', width=250)
    rg = ft.TextField(label='RG', width=150)
    pai = ft.TextField(label='Pai', width=395)
    mae = ft.TextField(label='Mãe', width=395)
    endereco = ft.TextField(label='Endereço', width=375)
    numero = ft.TextField(label='Número', width=100)
    bairro = ft.TextField(label='Bairro', width=395)
    cep = ft.TextField(label='CEP', width=320)
    cidade = ft.TextField(label='Cidade', width=405)
    uf = ft.TextField(label='UF', width=60)
    celular = ft.TextField(label='Celular', width=150)
    telefone = ft.TextField(label='Telefone', width=150)
    empresa = ft.Dropdown(width=415, label='Empresa', options=[
        ft.dropdown.Option("Nike"),
        ft.dropdown.Option("Senai"),
        ft.dropdown.Option("Intel"),
        ft.dropdown.Option("Akko")
    ])
    observacoes = ft.TextField(label='Observações', width=1220, multiline=True, min_lines=4, max_lines=30)

    page.add(
        ft.Row(controls=[ft.Text('Registre seus dados aqui por favor!', size=35)]),
        ft.Row(controls=[codigo, data_cadastro, nome_paciente]),
        ft.Row(controls=[sexo, nascimento, idade]),
        ft.Row(controls=[estado_civil, profissao, naturalidade, cartao_sus]),
        ft.Row(controls=[cpf, rg, pai, mae]),
        ft.Row(controls=[endereco, numero, bairro, cep]),
        ft.Row(controls=[cidade, uf, celular, telefone, empresa]),
        ft.Row(controls=[observacoes]),
        ft.Row(controls=[
            ft.ElevatedButton(text='Salvar', on_click=salvar),
            ft.Text('  ', width=475),
            ft.ElevatedButton(text='Limpar', on_click=limpar),
            ft.Text(' ', width=445),
            ft.ElevatedButton(text='Fechar', on_click=lambda _: page.window_close()),
        ])
    )

# Função para salvar os dados em um arquivo
def salvar(e):
    with open('paciente.txt', 'w') as arquivo:
        arquivo.write('Cadastro de paciente:\n')
        arquivo.write(f"     Codigo: {codigo.value}, Data do cadastro: {data_cadastro.value}, Nome do paciente: {nome_paciente.value}, Sexo: {sexo.value}, Nascimento: {nascimento.value}, Idade: {idade.value}\n")
        arquivo.write(f"     Estado Civil: {estado_civil.value}, Profissao: {profissao.value}, Naturalidade: {naturalidade.value}, Cartao SUS: {cartao_sus.value}, CPF: {cpf.value}, RG: {rg.value}\n")
        arquivo.write(f"     Pai: {pai.value}, Mae: {mae.value}, Endereco: {endereco.value}, Numero: {numero.value}, Bairro: {bairro.value}, CEP: {cep.value}\n")
        arquivo.write(f"     Cidade: {cidade.value}, UF: {uf.value}, Celular: {celular.value}, Telefone: {telefone.value}, Empresa: {empresa.value}, Observacoes: {observacoes.value}\n")
    print("Dados salvos com sucesso!")

#Função para limpar a tela
def limpar(e=None):
    codigo.value = ""
    data_cadastro.value = ""
    nome_paciente.value = ""
    sexo.value = None
    nascimento.value = ""
    idade.value = ""
    estado_civil.value = None
    profissao.value = None
    naturalidade.value = ""
    cartao_sus.value = ""
    cpf.value = ""
    rg.value = ""
    pai.value = ""
    mae.value = ""
    endereco.value = ""
    numero.value = ""
    bairro.value = ""
    cep.value = ""
    cidade.value = ""
    uf.value = ""
    celular.value = ""
    telefone.value = ""
    empresa.value = None
    observacoes.value = ""

    if e is not None:  # Se for chamado pelo botão "Limpar", atualizar a interface
        e.control.page.update()

ft.app(target=janela)
