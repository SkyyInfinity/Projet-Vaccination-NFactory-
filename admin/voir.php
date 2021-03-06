<?php
session_start();
include('../inc/pdo.php');
include('../inc/functions.php');



if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM contact WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $voir_message = $query->fetch();

    include('inc/admin_header.php');
?>
    <style>
        body{
            background-color: #d3d3d3;
        }
    </style>
        <table style="width:100%;text-align:center;">
            <tr>
                <th>Expéditeur</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>
                    <p><?= $voir_message['nom']; ?></p>
                </td>
                <td><?= $voir_message['email']; ?></td>
                <td>
                    <p style="overflow:visible;width:300px;margin:0 auto;"><?= $voir_message['message']; ?></p>
                    
                </td>
                <td><?= $voir_message['created_at']; ?></td>
                <td>

                    <a href="messagerie.php">Retour à la messagerie</a>

                </td>
            </tr>

        </table>

 
    
<?php
include('inc/admin_footer.php');
} else {
    redirect('404.php');
}

