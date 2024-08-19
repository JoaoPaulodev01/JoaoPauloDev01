import flet as ft

# Criação e configuração da janela
def main(page: ft.Page):
    page.title = 'Clone do Instagram'
    page.bgcolor = ft.colors.WHITE
    page.update()

    img = ft.Image(
        src="Novo Projeto.png",
        width=720,
        height=500,
        fit=ft.ImageFit.CONTAIN,
    )

    page.add(
        ft.Row(controls=[
            ft.Text(' ', width=1200)
        ]),
        ft.Row(controls=[
            img,
            ft.Column(controls=[
                ft.Text('                         Instagram', color=ft.colors.BLACK),
                ft.TextField(label='Telefone, nome de usuário ou email'),
                ft.TextField(label='Senha'),
                ft.CupertinoFilledButton(text='Entrar', width=300),
                ft.Text('---------------------   OU   ----------------------', color=ft.colors.BLACK),
                ft.Text(''),
                ft.Row(controls=[
                    ft.Text('             '),
                    ft.Image(
                        src="facebook-6338507_1280.png",
                        width=17,
                        height=17,
                        fit=ft.ImageFit.CONTAIN
                    ),
                    ft.Text('Entrar com o Facebook', color=ft.colors.BLUE)
                ]),
                ft.Text('                      Esqueceu a senha?', color=ft.colors.BLUE_800, width=250),
                ft.Text('             '),
                ft.Row(controls=[
                    ft.Text('             Não tem uma conta?', color=ft.colors.BLACK),
                    ft.Text('Cadastre-se', color=ft.colors.BLUE),
                ]),
                ft.Text('             '),
                ft.Text('                      Obtenha o aplicativo.', color=ft.colors.BLACK),
                ft.Row(controls=[
                    ft.Text(' '),
                    ft.Image(
                        src="tUzYKZ-xrQK.png",
                        width=120,
                        height=120,
                        fit=ft.ImageFit.CONTAIN
                    ),
                    ft.Image(
                        src="QQnPXT5YsC4.png",
                        width=105,
                        height=105,
                        fit=ft.ImageFit.CONTAIN
                    )
                ])
            ])
        ]),
        ft.Row(controls=[
            ft.Text('', width=100),
            ft.Text('Meta', color=ft.colors.BLACK),
            ft.Text('Sobre', color=ft.colors.BLACK),
            ft.Text('Blog', color=ft.colors.BLACK),
            ft.Text('Carreiras', color=ft.colors.BLACK),
            ft.Text('Ajuda', color=ft.colors.BLACK),
            ft.Text('API', color=ft.colors.BLACK),
            ft.Text('Privacidade', color=ft.colors.BLACK),
            ft.Text('Termos', color=ft.colors.BLACK),
            ft.Text('Localizações', color=ft.colors.BLACK),
            ft.Text('Instagram Lite', color=ft.colors.BLACK),
            ft.Text('Threads', color=ft.colors.BLACK),
            ft.Text('Carregamento de contatos e não usuáriuos', color=ft.colors.BLACK),
            ft.Text('Meta Verified', color=ft.colors.BLACK)
        ]),
        ft.Row(controls=[
            ft.Text('                   ', width=500),
            ft.Text('Português (Brasil) ˅', color=ft.colors.BLACK),
            ft.Text('© 2024 Instagram from Meta', color=ft.colors.BLACK)
        ])
    )

ft.app(target=main)
