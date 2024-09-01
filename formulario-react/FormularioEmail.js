/*importa funções dos módulos*/
import { ErrorMessage, Field, Form, Formik } from 'formik';
import * as Yup from 'yup';

/*cria e exporta validação de esquema*/
export const validationSchema = Yup.object().shape({
    email: Yup.string()
        .email('Endereço de e-mail inválido')
        .required('E-mail é obrigatório'),
});

/*cria e exporta o formulário com formik e usando o esquema de validação com Yup criado anteriormente*/
export function FormularioEmail() {
    return (
        <Formik
            initialValues={{ email: '' }}
            validationSchema={validationSchema}
            onSubmit={(values) => {
                console.log(values);
            }}
        >
            {({ handleSubmit }) => (
                <Form onSubmit={handleSubmit} className="form">
                    <div>
                        <h1>Formulário de E-mail</h1>
                    </div>
                    <div>
                        <label htmlFor="email">E-mail</label>
                        <Field type="email" id="email" name="email" />
                        <ErrorMessage name="email" component="div" className="error" />
                    </div>
                    <button type="submit" className="botao">Enviar</button>
                </Form>
            )}
        </Formik>
    );
}
