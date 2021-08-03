## Terceiro Exercicio

Esse SQL pode ser testado usando o próprio container do docker criado no exercício 1.
- Suba o container com o `make run` caso eles não estejam de pé
- Execute o comando `docker exec -ti mysql bash`
  - Isso te dará acesso à uma linha de comando dentro do container
- Acesse o banco de dados com o comando `mysql -uroot -proot superlogica`
- Use o banco `superlogica` com o comando `use superlogica;`
- Copie as queries do arquivo `Exercicio3.sql` e cole

### Enunciado

```
A partir das tabelas USUARIO e INFO, que atualmente estão preenchidas com estas
informações, crie um DML para o resultado esperado (Crie as tabelas, insira os dados, e
exiba o resultado esperado).

USUARIO
Id cpf         nome
1  16798125050 Luke Skywalker
2  59875804045 Bruce Wayne
3  04707649025 Diane Prince
4  21142450040 Bruce Banner
5  83257946074 Harley Quinn
6  07583509025 Peter Parker

INFO
Id cpf         genero ano_nascimento
1  16798125050 M      1976
2  59875804045 M      1960
3  04707649025 F      1988
4  21142450040 M      1954
5  83257946074 F      1970
6  07583509025 M      1972

Tabela de resultado esperado
usuario            maior_50_anos
Peter Parker - M   NÃO
Luke Skywalker - M NÃO
Bruce Banner - M   SIM
```