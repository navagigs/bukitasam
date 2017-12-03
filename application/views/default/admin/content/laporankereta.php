 <table width="100%" border="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>JUMLAH GERBONG</th>
                                            <th>TUJUAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT *  FROM kereta");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->jumlah_gerbong; ?></td>
                                            <td align="center"><?php echo $row->tujuan; ?></td>
                                          
                                        </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>