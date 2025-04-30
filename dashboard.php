<?php
include("conexao.php");
$sql = "SELECT * FROM transacoes";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Financeiro</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .table-container, .panel {
            flex: 1 1 48%;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .table-container, .panel {
                flex: 1 1 100%;
            }
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .positivo {
            color: green;
            font-weight: bold;
        }

        .negativo {
            color: red;
            font-weight: bold;
        }

        .neutro {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h2>Lista de Usuários</h2>
            <table>
                <tr>
                    <th>Valor</th>
                    <th>Salário</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['valor']; ?></td>
                        <td><?= $row['salario']; ?></td>
                        <td><?= $row['descricao']; ?></td>
                        <td><?= $row['data_transacao']; ?></td>
                        <td>
                            <?php
                            if ($row['salario'] > $row['valor']) {
                                echo "<span class='positivo'>Salário cobre a despesa</span>";
                            } elseif ($row['salario'] < $row['valor']) {
                                echo "<span class='negativo'>Salário insuficiente</span>";
                            } else {
                                echo "<span class='neutro'>Salário igual à despesa</span>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
