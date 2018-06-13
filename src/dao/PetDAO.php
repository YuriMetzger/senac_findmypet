public class PetDAO implements IDAO {

	public function insert($object, $conn) {
		$sql = 'INSERT INTO PET (ID_USER, NAME, DESCRIPTION, BIRTH_DATE) VALUES (?, ?, ?, ?, ?)';

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $object.getUserID());
		$stmt->bindParam(2, $object.getName());
		$stmt->bindParam(3, $object.getDescription());
		$stmt->bindParam(4, $object.getBirthDate());

		return $stmt->execute();
	}

	public function delete($id, $conn) {
		$sql = 'DELETE PET WHERE ID_PET = ?';

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $id);

		return $stmt->execute();
	}

	public function select($id, $conn) {
		$pet = new Pet();
		$sql = 'SELECT * FROM PET WHERE ID_PET = ?';

		$rs = $conn->prepare($sql);
		$rs->bindParam(1, $id);

		if ($rs->execute()
			&& $rs->rowCount() > 0) {
			while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
				$pet->setPetID($row->id_pet);
				$pet->setUserID($row->id_user);
				$pet->setName($row->name);
				$pet->setDescription($row->description);
				$pet->setBirthDate($row->birth_date);
			}
		}

		return $pet;
	}
}
