# Objetivo
O Objetivo desde repositorio é a aprimoração de conceitos de FrontEnd e o aprendizado com o WordPress
utilizando pré-processadores 
# SASS
* SASS = Syntactically Awesome Stylesheets
* SASS é um Pré-Processador de CSS 

# Stylus
Stylus é uma linguagem de pré-processador de folha de estilo dinâmica compilada em Cascading Style Sheets. Seu design é influenciado por Sass and Less. É considerada a quarta sintaxe de pré-processador CSS mais usada.

# Dicas

* O arquivo `wp-config.php` serve para toda a configuração da conexão do banco de dados

* Pasta `wp-admin` fica todos os arquivos do painel do wordpress

* Pasta `wp-includes` é onde fica todos os arquivos chave para o funcionamento do wordpress

* Pasta `wp-content` fica todos os plug-in,temas do wordpress

# Estrutura do tema

parts/
    footer.html
    header.html
patterns/
    example.php
styles/
    example.json
templates/
    404.html
    archive.html
    index.html(obrigatório)
    singular.html
README.txt
functions.php
screenshot.png
style.css(obrigatório)
theme.json

# Pastas Padrões

`parts`( Partes do modelo ): Abriga peças de modelo personalizadas para o seu tema. Partes são seções menores que você pode incluir em modelos de nível superior. Freqüentemente, isso inclui itens como cabeçalhos, rodapés e barras laterais.

`patterns`( Padrões de Bloco ): Padrões reutilizáveis ​​compostos por um ou mais blocos que os usuários podem inserir através da interface do editor. O WordPress registrará automaticamente os arquivos incluídos nesta pasta.

`styles`( Variações de estilo ): variações nas configurações globais do tema e nos estilos armazenados em arquivos JSON individuais.

`templates`( Modelos ): Arquivos que representam a estrutura geral do documento do front-end. Os modelos são compostos de marcação de bloco e são o que os visitantes do site veem.

# Pastas Opcionais

`assets`( Incluindo ativos ): Muitos autores de temas usam esta pasta para armazenar CSS, imagens/mídia e JavaScript adicionais necessários para seu tema. Esta pasta também pode ter outros nomes, como resourcesou public.

`inc`( Funcionalidade Personalizada ): Os temas geralmente terão classes ou arquivos PHP personalizados armazenados nesta pasta para funcionalidade adicional. Esta pasta também pode ser vista com os nomes includes, srce muito mais.

# Arquivos Opcionais

`.editorconfig`( EditorConfig ): Usado para configurar a formatação, como finais de linha e espaçamento, para editores de código.

`.gitattributes`( Git: Attributes ): Configura atributos com o sistema de controle de versão Git.

`.gitignore`( Git: Ignore ): Define arquivos a serem ignorados ao enviar código para um repositório Git.

`CHANGELOG.md`( Mantenha um Changelog ): Um registro legível de mudanças importantes para cada versão do seu tema.

`LICENSE.md`( Revisão do Tema: Licenciamento e Direitos Autorais ): Define a licença do tema. Observe que todos os temas enviados ao diretório de temas do WordPress devem ser licenciados sob a GPL v2+.

`package.json`( npm: package.json ): Freqüentemente usado para definir um processo de construção e dependências de desenvolvimento em um ambiente Node.