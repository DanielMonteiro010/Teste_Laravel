Autor(es):
	Daniel Monteiro de Oliveira Silva

Tecnologias:
	- Laravel (backend)
		- PHP
		- SQLite
		- Composer
		- Artisan
	- VueJS (frontend)
		- JavaScript
		- HTML
		- Vuetify
		- NPM
		- Redaxios

Observações:
	- O fuso-horário utilizado nos registros foi o UTC para manter o banco de dados uniforme (evitar diferentes horários se utilizado em diferentes países);
	- As diferentes telas foram feitas como componentes ao invés de diferentes páginas em prol de simplificar o CRUD;
	- Um dos requerimentos apresentados foi que um usuário não poderia ter múltiplos perfis, para implementar tal requerimento, uma checagem para impedir CPFs duplicados foi utilizada;
	- A longo prazo diferentes melhorias de qualidade de vida poderiam ser feitas
		- Implementar autoformatação nos campos de entrada;
		- Formatar a data/hora de registro;
		- Implementar edição na tela de procura;
		- Usar tooltips ou popups ao invés do sistema de alerta;
		- Mudar a tela de detalhes para um popup;
		- Entre outras pequenas mudanças visando uma interface mais fluida