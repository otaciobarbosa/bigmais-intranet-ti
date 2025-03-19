import re

# Abrir o arquivo de entrada
with open('teste.txt', 'r') as input_file:
    # Abrir o arquivo de saída
    with open('novo_teste.txt', 'w') as output_file:
        # Ler cada linha do arquivo de entrada
        lines = input_file.readlines()

        # Processar cada linha
        for line in lines:
            line = line.rstrip('\r\n')

            # Encontrar o índice do primeiro espaço em branco
            index = line.find(' ')

            # Verificar se há espaço em branco na linha
            if index != -1:
                # Adicionar '+++' após o primeiro espaço em branco
                line = line[:index+1] + '+++' + line[index+1:]

            # Escrever a linha processada no arquivo de saída
            output_file.write(line + '\n')